<?php

class sfWidgetListaFranjas extends sfWidgetForm
{
	protected function configure($options = array(), $attributes = array())
	{
		$this->addRequiredOption('registro');
		$this->addOption('delete', true);

		parent::configure($options, $attributes);
	}

	public function render($name, $value = null, $attributes = array(), $errors = array())
	{
		echo "asd";
/*		ProjectConfiguration::getActive()->loadHelpers( array( 'Url' ) ); 

		$registro = $this->getOption('registro');

		$url_update_doc = url_for('main/updateDocumento?visita_id='.$registro->getId());

		if (class_exists(get_class($registro)."Documento") && count($registro->getDocumentos()) > 0) {
			$s = "<script>var url_update_doc = '$url_update_doc';</script><script src='/js/documentos.js'></script><style>#documentos_anexos .arrow_down, #documentos_anexos .arrow_up{cursor:pointer;}.layout_agenda .sel_doc{display:none;}</style><table id='documentos_anexos'>";

			$tipos_map = array(
				'CI'		=> 'Consentimiento informado',
				'CILPD'		=> 'Consentimiento informado ley orgánica de protección de datos',
				'PT'		=> 'Petición',
				'INCOMP'	=> 'Incomparecencia',
				'ESCRITO'	=> 'Escrito',
				'RECH'		=> 'Rechazado',
				'INFCLI'	=> 'Información del cliente',
				'PRUEBA'	=> 'Prueba médica',
			);

			foreach($registro->getDocumentos() as $d) {
				$s .= "<tr class='documento_anexo' documento_id='{$d->getId()}'>";
				$s .= "<td>{$d->getNombre()}</td>";
				if($d->getTipo())
				{
					$tipo_desc = $tipos_map[$d->getTipo()];
					$s .= "<td title='$tipo_desc'>({$d->getTipo()})</td>";
				}
				$s .= "<td>";
				$s .= "<a href='".url_for("main/verDocumento?entidad=".get_class($registro)."&documento_id={$d->getId()}&registro_id={$registro->getId()}")."' class='ver_anexo' target='_blank'><img src='/images/icon_search.png'></a>";
				$s .= "</td>";
				$s .= "<td>";
				if ($this->getOption('delete') === true) {
					$s .= "<a href='#' class='borrar_documento' entidad='".get_class($registro)."' registro_id='{$registro->getId()}' documento_id='{$d->getId()}'><img src='/images/button_erase.png'></a>";
				}
				$s .= "</td>";
				$s .= "<td class='sel_doc'>";
				$s .= "<img class='arrow_down' src='/images/arrow_down.png'/> <img class='arrow_up' src='/images/arrow_up.png'/>";
				$s .= "</td>";
				$s .= "<td class='sel_doc'>";
				$s .= "<input type='checkbox' ref='".$d->getId()."' ".($d->getInformeCompleto()?'checked':'').">";
				$s .= "</td>";
				$s .= "</tr>";
			}
			$s .= "</table>";
		}
		else {
			$s = __('No hay anexos');
		}

		return $s;
*/
	}
}
