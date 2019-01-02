<?php namespace App\Controllers;

use App\Libraries\SessionRouter;
use App\Models\ArchivoModel;
use CodeIgniter\Controller;


class Archivo extends Controller
{



    public function __construct()
    {
        $this->model = new ArchivoModel();
        $this->session = new SessionRouter();
        $this->params = array(
            'model' => new ArchivoModel(),
            'id_cuenta' => $this->session->user->id_cuenta,
        );

    }

    public function index()
    {
        $entities = $this->model->allWithUrl($this->session->cuenta->id_cuenta);

        $this->setEntities($entities,$this->model->headers,$this->model->fields);

        $html = view('archivo/index',$this->params);

        $this->response->setTable($this->model->table);

        $this->response->appendBody($html);

        $this->response->sendJson();
    }
    public function guardar(){
        if($imagefile = $this->request->getFiles())
        {
            if(sizeof($imagefile) > 1){
                foreach($imagefile[$this->model->table] as $img)
                {

                    if ($img->isValid() && ! $img->hasMoved())
                    {
                        $newName = $img->getName();
                        $entidad = new \App\Entities\Archivo();

                        $entidad['archivo']=$img->getName();
                        $entidad['id_cuenta'] = $this->session->user->id_cuenta;
                        $entidad['type']=$img->getClientMimeType();
                        $entidad['size']=$img->getSize();
                        $entidad['tmp_name']=$img->getTempName();
                        $entidad['blob'] = file_get_contents($img->getTempName());
                        $img->move(WRITEPATH.'uploads', $newName);


                        if($this->model->save($entidad)){
                            $this->response->appendBody('Se ha cargado el archivo');
                        }
                        else{
                            $this->response->appendBody('Erro no cargado el archivo'.$img->error);
                        }

                    }else {
                        $this->response->appendBody($img->getErrorString().'('.$img->getError().')');
                    }
                }
            }
            else {
                $img = $imagefile[$this->model->table];
                if ($img->isValid() && ! $img->hasMoved())
                {
                    $newName = $img->getName();

                    $entidad['archivo']=$img->getName();
                    $entidad['id_cuenta'] = $this->session->user->id_cuenta;
                    $entidad['type']=$img->getClientMimeType();
                    $entidad['size']=$img->getSize();
                    $entidad['tmp_name']=$img->getTempName();
                    $entidad['blob'] = file_get_contents($img->getTempName());

                    $img->move(WRITEPATH.'uploads', $newName);

                    if($this->model->save($entidad)){

                        $this->response->appendBody('Se ha cargado el archivo');

                    }
                    else{

                        $this->response->appendBody('Erro no cargado el archivo'.$img->error);

                    }
                }else {

                    $this->response->appendBody($img->getErrorString().'('.$img->getError().')');
                }
            }

        }
        else{

            $this->response->appendBody('No hay archivos');

        }
        $this->response->setRedirect($this->model->table);
        $this->response->sendJsonToModal('Información');

    }
    public function sendBlob($entidad){
        $file = WRITEPATH.'uploads/'.$entidad->archivo;
        header("Content-Disposition:attachment;filename='".$entidad->archivo."'");
        header( "content-type:".$entidad->type);
        header('Content-Length: '.$entidad->size);
        echo $entidad->blob;
    }
    public function ver(){

        $entidad = $this->model->find($this->request->getPostGet('id'));
        $toFrame = $this->request->getPostGet('toFrame') == 'true' ? true:false;

        $file = WRITEPATH.'uploads/'.$entidad->archivo;

        if ($toFrame){
            switch ($entidad->type){
                case 'image/png':
                    $img =  '<img width="100%" src="data:image/png;base64,'.base64_encode( $entidad->blob ).'"/>';
                    $this->response->appendBody($img);
                    $this->response->sendJsonToModal();
                    break;
                case 'image/jpg':
                    $img =  '<img width="100%" src="data:image/jpg;base64,'.base64_encode( $entidad->blob ).'"/>';
                    $this->response->appendBody($img);
                    $this->response->sendJsonToModal();
                    break;
                case 'image/jpeg':
                    $img =  '<img width="100%" src="data:image/jpeg;base64,'.base64_encode( $entidad->blob ).'"/>';
                    $this->response->appendBody($img);
                    $this->response->sendJsonToModal();
                    break;
                case 'application/pdf':
                    $img =  '<iframe width="100%" height="400px" src="data:'.$entidad->type.';base64,'.base64_encode( $entidad->blob ).'"></iframe>';
                    $this->response->appendBody($img);
                    $this->response->sendJsonToModal();
                    break;
                default:
                    $this->sendBlob($entidad);
                    break;
            }
        }else{
            $this->sendBlob($entidad);
        }

    }
    public function preview(){

        $entidad = $this->model->find($this->request->getPostGet('id'));

        switch ($entidad->type){
            case 'image/png':
                $this->sendPreview($entidad);
                break;
            case 'image/jpg':
                $this->sendPreview($entidad);
                break;
            case 'image/jpeg':
                $this->sendPreview($entidad);
                break;
            case 'application/pdf':
                $entidad =  'assets/img/icon-pdf.png';
                $this->sendPreview($entidad);
                break;
            default:
                $entidad =  'assets/img/icon-error.png';
                $this->sendPreview($entidad);
                break;
        }

    }
    public function sendPreview($entidad){



        if (is_string($entidad)){
            $file = $entidad;
            header( "content-type: image/png");
            $contents = file_get_contents($file);
        }else{
            header( "content-type: ".$entidad->type);
            $contents =$entidad->blob;
        }

        echo $contents;
    }
    public function imagenes(){

        $entities = $this->model->allImages($this->session->cuenta->id_cuenta);

        $this->params['entidades'] = $entities;

        $html = view('archivo/index/carousell',$this->params);

        $this->response->appendBody($html);

        $this->response->sendJson();
    }
    public function pdfs(){
        $entities = $this->model->allImages($this->session->cuenta->id_cuenta);

        $this->params['entidades'] = $entities;

        $html = view('archivo/index/carousell',$this->params);

        $this->response->appendBody($html);

        $this->response->sendJson();
    }

}
