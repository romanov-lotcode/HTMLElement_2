<?php

/*
	Example
	
	$html_element['text_string'] = new HTMLElement\HTMLTextStringElement();
	$html_element['text_string']->setCaption('�����');
	$html_element['text_string']->setName('text_string');
	$html_element['text_string']->setId('text_string');
	$html_element['text_string']->setMinMax(0, 99);
	$html_element['text_string']->setPregMatch('/^[�-�]{2}$/');
	$html_element['text_string']->setValueFromRequest();	
	
	$html_element['text_string']->check();
	
	$html_element['text_string']->render();
*/


namespace HTMLElement;

class HTMLTextStringElement extends HTMLTextElement
{
    private $min = false;
    private $max = false;
	private $preg_match = null;
   /**
     * ������������� ���������� ���������.
     * @param $value value - ���������� ���������
     */
    public function setPregMatch($value)
    {
        if (!empty($value))
        {
            $this->preg_match = $value;
        }
    }

    /**
     * ���������� ���������� ���������.
     * @return string
     */
    public function getPregMatch()
    {
        return $this->preg_match;
    }
	
   /**
     * ������������� ����������� ��������.
     * @param $value value - ����������� ��������
     */
    public function setMin($value)
    {
        if (is_int($value))
        {
            $this->min = $value;
			if ($value > 0)
			{
				parent::setNecessarily(true);
			}
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
		if (!parent::getNecessarily() && $this->getValue() == '')
		{
			return;
		}
        if ($this->getPregMatch() !== null)
        {
			if (preg_match($this->getPregMatch(), parent::getValue()) !== 1) 
			{
                parent::setCheck(false);
                return;
			}		
        }	
        if ($this->getMin() !== false)
        {
            if (strlen(parent::getValue()) < $this->getMin())
            {
                parent::setCheck(false);
                return;
            }
        }
        if ($this->getMax() !== false)
        {
            if (strlen(parent::getValue()) > $this->getMax())
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
                : '').'>'.$this->getCaption().':'
            . ((parent::getNecessarily() !== false)? ' *':'').'</label><br>'
            :'')
        . '<input '
        .$el_attributes
        . (($this->getDisabled() === true)? 'disabled ' : '')
        .'  />';
    }
}