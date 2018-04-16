<?php

namespace HTMLElement;

class HTMLSelectOptionElement
{
    /*******************************************************
     ********************* ���� ������ *********************
     *******************************************************/

    const HTML_E_CONFIG_VALUE_NAME = 'value';
    const HTML_E_CONFIG_TEXT_NAME = 'text';
    const HTML_E_CONFIG_ID_NAME = 'id';
    const HTML_E_CONFIG_STYLE_NAME = 'style';
    const HTML_E_CONFIG_CLASS_NAME = 'class';

    /**
     * ������� ���� ������ � ���� ������������
     * HTML �������� (����� ���������) � �� ���������
     * � ���� ����=>��������.
     * ������: name='someName', value='someValue' � �.�.
     * @var array
     */
    private $element_config = array();

    /**
     * ����� ��������.
     * @var string
     */
    private $text = false;

    /**
     * ������ ��������.
     * @var string
     */
    private $group = null;

    /**
     * ���� ��� ��������.
     * ���� ����� ��������� 2 ��������� (������/�� ������).
     * true - ������� ������.
     * false - ������� �� ������.
     * @var bool
     */
    private $selected = false;

    /**
     * �������� ��������.
     * @var string
     */
    private $checking = true;	
	
    /*******************************************************
     ******************** ������ ������ ********************
     *******************************************************/

    /**
     * ������������� �������� �������� ��������.
     * @param $key string - ����
     * @param $value string - ��������
     */
    public function setConfig($key, $value)
    {
        __setConfig($this->element_config, $key, $value);
    }

    /**
     * ���������� �������� �������� �� �����.
     * @param $key string - ����
     * @return bool OR string
     */
    public function getConfig($key)
    {
        if (!isset($this->element_config[$key]))
        {
            return false;
        }
        return $this->element_config[$key];
    }

    /**
     * ���������� ������������ ��������.
     * @return array
     */
    public function getFullConfig()
    {
        return $this->element_config;
    }

    /**
     * ������������� �������� ��� ��������.
     * @param $value string - ��������
     */
    public function setValue($value)
    {
        $this->setConfig(self::HTML_E_CONFIG_VALUE_NAME, $value);
    }

    /**
     * ���������� �������� ��������.
     * @return bool OR string
     */
    public function getValue()
    {
        return $this->getConfig(self::HTML_E_CONFIG_VALUE_NAME);
    }

    /**
     * ������������� ����� ��������.
     * @param $value string - �����.
     * @return bool
     */
    public function setText($value)
    {
        if (empty($value))
        {
            return false;
        }
        $this->text = $value;
    }

    /**
     * ��������� ����� ��������.
     * @return bool OR text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * ������������� ������ ��������.
     * @param $value string - ������
     * @return bool
     */
    public function setGroup($value)
    {
        if ($value !== null)
        {
            $this->group = $value;
        }
    }

    /**
     * ��������� ������ ��������.
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * ������������� id ��������.
     * @param $value string - id.
     */
    public function setId($value)
    {
        $this->setConfig(self::HTML_E_CONFIG_ID_NAME, $value);
    }

    /**
     * ���������� id ��������.
     * @return bool OR string
     */
    public function getId()
    {
        return $this->getConfig(self::HTML_E_CONFIG_ID_NAME);
    }

    /**
     * ������������� �������� �����.
     * @param $value string - �������� �����.
     * @return bool
     */
    public function setStyle($value)
    {
        if (empty($value))
        {
            return false;
        }
        $this->element_config[self::HTML_E_CONFIG_STYLE_NAME] .= ' ' . $value;
    }

    /**
     * ��������� ����� ����� � �������� class
     * @param $value string - �����
     * @return bool
     */
    public function addStyleClass($value)
    {
        if (empty($value))
        {
            return false;
        }
        $this->element_config[self::HTML_E_CONFIG_CLASS_NAME] .= ' ' . $value;
    }

    /**
     * ������������ html �������.
     * @return string
     */
    public function render()
    {
        $el_attributes = '';
        $full_config = $this->getFullConfig();

        foreach ($full_config as $key => $val)
        {
            if ($val !== false)
            {
                if ($el_attributes != '') $el_attributes .= ' ';

                $el_attributes .= $key .'="'.$val.'"';
            }
        }

        if ($this->getSelected() === true)
        {
            $el_attributes .= ' selected';
        }

        return '<option '. $el_attributes .'>'
        . (($this->getText() !== false)? $this->getText() : '') .'</option>';
    }

    /**
     * ������������� ���� ��� ��������.
     * @param $value bool - ���� ��������
     * @return bool
     */
    public function setSelected($value)
    {
        if (!is_bool($value))
        {
            return false;
        }
        $this->selected = $value;
    }
	
    /**
     * ���������� �������� ����� ��������.
     * @return bool
     */
    public function getSelected()
    {
        return $this->selected;
    }
}