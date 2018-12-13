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
                        $entidad['type']=$img->getClientExtension();
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

                $img = $imagefile[$this->model->table];
                if ($img->isValid() && ! $img->hasMoved())
                {
                    $newName = $img->getName();


                    $entidad['archivo']=$img->getName();
                    $entidad['id_cuenta'] = $this->session->user->id_cuenta;
                    $entidad['type']=$img->getClientExtension();
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


        }else{

            $this->response->appendBody('No hay archivos');

        }
        $this->response->setRedirect($this->model->table);
        $this->response->sendJsonToModal();
    }
    public function ver(){

    }

}
