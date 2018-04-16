<?php

/*
	Example
	
	$html_element['text_integer'] = new HTMLElement\HTMLTextIntegerElement();
	$html_element['text_integer']->setCaption('����������');
	$html_element['text_integer']->setName('text_integer');
	$html_element['text_integer']->setNecessarily(false);
	$html_element['text_integer']->setMinMax(-30, 5);
	$html_element['text_integer']->setId('text_integer');
	$html_element['text_integer']->setValueFromRequest();	
	
	$html_element['text_integer']->check();		
	
	$html_element['text_integer']->render();
*/

namespace HTMLElement;

class HTMLTextIntegerElement extends HTMLTextElement
{	
    private $min = ~PHP_INT_MAX;
    private $max = PHP_INT_MAX;

   /**
     * ������������� ����������� ��������.
     * @param $value value - ����������� ��������
     */
    public function setMin($value)
    {
        if (is_int($value))
        {
            $this->min = $value;
        }
    }

    /**
     * ���������� ����������� �������� ����.
     * @return bool OR value
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * ������������� ������������ ��������.
     * @param $value value - ������������ ��������
     */
    public function setMax($value)
    {
        if (is_int($value))
        {
            $this->max = $value;
        }
    }

    /**
     * ���������� ������������ ��������.
     * @return bool OR value
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * ������������� ����������� � ������������ ��������.
     * @param $min value - ����������� ��������
     * @param $max value - ������������ ��������
     */
    public function setMinMax($min, $max)
    {
        $this->setMin($min);
        $this->setMax($max);
    }	
	

	
    /**
     * �������� ����������� �������� ��� �������� ����.
     */
    public function check()
    {
		if (!parent::getNecessarily() && parent::getValue() == '')
		{
			return;
		}
		if (!is_numeric(parent::getValue()))
		{
			parent::setCheck(false);
			return;
		}
		if ($this->getMin() !== false)
		{
			if (parent::getValue() < $this->getMin())
			{
				parent::setCheck(false);
				return;
			}
		}
		if ($this->getMax() !== false)
		{
			 if (parent::getValue() > $this->getMax())
			{
				parent::setCheck(false);
				return;
			}
		}
    }

    /**
     * ������������ html �������.
     * @return string
     */
    public function render()
    {
        $el_attributes = '';

        $el_attributes .= ((!parent::getConfig('type'))?' type="text"': '');
        //parent::setStyle('width: 250px;');
        if (parent::getCheck() === false)
        {
            $this->setStyle('background-color: #fffafa; border-color: #df8080;');
        }

        $full_config = parent::getFullConfig();

        foreach ($full_config as $key => $val)
        {
            if ($val !== false)
            {
                if ($el_attributes != '') $el_attributes .= ' ';

                $el_attributes .= $key .'="'.$val.'"';
            }
        }

        return ((parent::getCaption() != '')
            ? '<label'.
            ((parent::getId() != '' && parent::getId() != false)
                ? ' for="'. parent::getId().'"'
                : '').'>'.parent::getCaption().':'
            . ((parent::getNecessarily() !== false)? ' *':'').'</label><br>'
            :'')
        . '<input '
        .$el_attributes
        . ((parent::getDisabled() === true)? 'disabled ' : '')
        .'  />';
    }
}