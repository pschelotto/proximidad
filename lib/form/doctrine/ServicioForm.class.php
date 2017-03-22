<?php

/**
 * Servicio form.
 *
 * @package    proximidad
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ServicioForm extends BaseServicioForm
{
	public function configure()
	{
//        $this->widgetSchema['imagen'] = new sfWidgetFormInputFile();

		$this->widgetSchema['imagen'] = new sfWidgetFormInputFileEditable(array(
			'label'     => 'Imagen',
			'file_src'  => '/uploads/servicios/'.$this->getObject()->getImagen(),
			'is_image'  => true,
			'edit_mode' => !$this->isNew(),
			'template'  => $this->getObject()->getImagen() ? '<div class="thumb">%file%<br />%input%<br />%delete% %delete_label%</div>':'%input%',
		));

        $this->validatorSchema['imagen'] = new sfValidatorFile(array(
        	'path' =>  sfConfig::get('sf_upload_dir').'/servicios',
			'mime_types' => 'web_images',
			'required'   => false,
        ));

		$this->validatorSchema['imagen_delete'] = new sfValidatorPass();
	}
}
