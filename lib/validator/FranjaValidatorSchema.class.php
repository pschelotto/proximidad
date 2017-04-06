<?php

class FranjaValidatorSchema extends sfValidatorSchema
{
/*
	protected function configure($options = array(), $messages = array()) {
		$this->addMessage('nombre', 'Es necesario introducir el nombre del anexo');
		$this->addMessage('path', 'Es necesario indicar el archivo a anexar');
	}

	protected function doClean($values) {
		$errorSchema = new sfValidatorErrorSchema($this);

		foreach($values as $key => $value) {
			$errorSchemaLocal = new sfValidatorErrorSchema($this);

			// path is filled but no nombre
			if ($value['path'] && !$value['nombre']) {
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'nombre');
			}

			// nombre is filled but no path
			if ($value['nombre'] && !$value['path']) {
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'path');
			}

			// no nombre and no path, remove the empty values
			if (!$value['path'] && !$value['nombre']) {
				unset($values[$key]);
			}

			// some error for this embedded-form
			if (count($errorSchemaLocal)) {
				$errorSchema->addError($errorSchemaLocal, (string) $key);
			}
		}

		// throws the error for the main form
		if (count($errorSchema)) {
			throw new sfValidatorErrorSchema($this, $errorSchema);
		}

		return $values;
	}
*/
}
