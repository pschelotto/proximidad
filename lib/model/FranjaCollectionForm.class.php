<?php

class FranjaCollectionForm extends sfForm
{
	public function configure() {
		if (!$registro = $this->getOption('registro'))
			throw new Exception('Hay que indicar en "registro" a dónde vamos a anexar las franjas');

		for ($i=0; $i<$this->getOption('cantidad', 7); $i++) {
			$clase_doc = "Franja";
			$clase_form = "FranjaForm";

			$doc = new $clase_doc();
			$doc[get_class($registro)] = $registro; //$doc['Visita'] = $registro;

			$form = new $clase_form($doc);
			$this->embedForm($i, $form);
		}

//		$this->mergePostValidator(new FranjaValidatorSchema());
		$this->mergePostValidator(new sfValidatorPass());
	}
}
