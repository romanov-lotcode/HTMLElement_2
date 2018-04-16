<?php

namespace HTMLElement;


class HTMLCheckboxAndRadio extends HTMLElementBase
{
    /*******************************************************
     ********************* ���� ������ *********************
     *******************************************************/

    // ��������� ������������ ��������
    const HTML_E_CONFIG_VALUE_NAME = 'value';

    /**
     * ���� ��� ��������.
     * ���� ����� ��������� 2 ��������� (�������/�� �������).
     * true - ������� �������.
     * false - ������� �� �������.
     * @var bool
     */
    private $checked = false;

    /*******************************************************
     ******************** ������ ������ ********************
     *******************************************************/
    /**
     * ������������� �������� ��������.
     * @param $value string - ��������
     */
    public function setValue($value)
    {
        parent::setConfig(self::HTML_E_CONFIG_VALUE_NAME, $value);
    }

    /**
     * ���������� �������� ��������.
     * @return bool OR string
     */
    public function getValue()
    {
        return parent::getConfig(self::HTML_E_CONFIG_VALUE_NAME);
    }

    /**
     * ������������� ���� ��� ��������.
     * @param $value bool - ���� ��������
     * @return bool
     */
    public function setChecked($value)
    {
        if (!is_bool($value))
        {
            return false;
        }
        $this->checked = $value;
    }

    /**
     * ���������� �������� ����� ��������.
     * @return bool
     */
    public function getChecked()
    {
        return $this->checked;
    }
	
    /**
     * �������� ����������� �������� ��� �������� ����.
     */
    public function check()
    {
		if (!parent::getNecessarily())
		{
			return;
		}	

        if ($this->getChecked() !== true)
        {
			parent::setCheck(false);
			return;
        }

    }	

/**
     * ������������� �������� �� ������� ����� ������� $_REQUEST.
	 * @return bool
     */	
    public function setCheckedFromRequest()
    {	
		$name = parent::getName();
		
		if ($name == '')
		{
			return false;
		}
			
		$is_array = false;	
		
		if (substr($name, -1) == ']')
		{
			$start_pos = strpos($name, '[');
			if ($start_pos !== false)
			{
				$name = substr($name, 0, $start_pos); 
				$is_array = true;
			}
		}
		
        if (!isset($_REQUEST[$name]))
        {
            return false;
        }

		$data = $_REQUEST[$name];
		
		if ($is_array)
		{
			if (array_key_exists(array_search($this->getValue(), $data), $data))
			{
				$this->setChecked(true);
			}		
		}else{
			if ($data == $this->getValue());
			{
				$this->setChecked(true);
			}			
		}
		return true;
    }		
}