<?php

namespace HTMLElement;

/**
 * ������������� ������������ ��� �������, �������
 * ������ � ������ ������� ���������.
 * @param $data object - ������
 * @param $key string - ����
 * @param $value string - ��������
 * @return bool
 */
function __setConfig(&$data, $key, $value)
{
    if (empty($key))
    {
        return false;
    }
    $data[$key] = $value;
}


class HTMLElementBase
{
    /*******************************************************
     ********************* ���� ������ *********************
     *******************************************************/

    private $default_charset = 'CP1251';

    /**
     * ������������ �� � ������ �������.
     * @var bool
     */
    private $necessarily = false;


	
    // ��������� ������������ ��������
    const HTML_E_CONFIG_NAME_NAME = 'name';
    const HTML_E_CONFIG_STYLE_NAME = 'style';
    const HTML_E_CONFIG_ID_NAME = 'id';
    const HTML_E_CONFIG_CLASS_NAME = 'class';

    /*
     * ��� �������� ��������. ���� ���� ������ ���������
     * �� false, ������ ������ �� �������� ��������.
     * ��������� true - ������ �������� ��������.
     */
    private $check = true;

    /*
     * ���������. ����� ���������� � <label />.
     */
    private $caption = false;

    /**
     * ���� ��� ���������/���������� ��������.
     * false - ������� �������.
     * true - ������� ��������.
     * @var bool
     */
    private $disabled = false;

    /**
     * ������� ���� ������ � ���� ������������
     * HTML �������� (����� ���������) � �� ���������
     * � ���� ����=>��������.
     * ������: name='someName', value='someValue' � �.�.
     * @var array
     */
    private $element_config = array();

    /*******************************************************
     ******************** ������ ������ ********************
     *******************************************************/

    /**
     * ������������� ����������� �� �������� �������.
     * @param $value bool
     */
    public function setNecessarily($value)
    {
        if (is_bool($value))
        {
            $this->necessarily = $value;
        }
    }

    /**
     * ���������� ������������ �� �������� �������.
     * @return bool
     */
    public function getNecessarily()
    {
        return $this->necessarily;
    }	

    /**
     * ���������� ��������� �� ���������.
     * @return string
     */
    public function getDefaultCharset()
    {
        return $this->default_charset;
    }

    /**
     * ������������� �������� ��� ���������.
     * @param $value string - �������� ���������
     * @return bool
     */
    public function setCaption($value)
    {
        if (empty($value))
        {
            return false;
        }
        $this->caption = $value;
    }

    /**
     * ���������� ��������� ��������.
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }


    /*
    * *******************************************************
    * ��������� � ��������� �������� ��������. ������ � ����������
    * *******************************************************
    */

    /**
     * ������������� �������� �������� ��������.
     * @param $key string - ����
     * @param $value - ��������
     * @return bool
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
     * ������������� ��� ��������.
     * @param $value string - ��������
     */
    public function setName($value)
    {
        $this->setConfig(self::HTML_E_CONFIG_NAME_NAME, trim($value));
    }

    /**
     * ���������� ��� ��������.
     * @return bool OR string
     */
    public function getName()
    {
        return $this->getConfig(self::HTML_E_CONFIG_NAME_NAME);
    }

    /**
     * ������������� ID ��������.
     * @param $value string - ��������
     */
    public function setId($value)
    {
        $this->setConfig(self::HTML_E_CONFIG_ID_NAME, trim($value));
    }

    /**
     * ���������� ID ��������.
     * @return bool OR string
     */
    public function getId()
    {
        return $this->getConfig(self::HTML_E_CONFIG_ID_NAME);
    }

    /**
     * ������������� �������� ��� ��������� ��������.
     * @param $value bool - true - �� ���������� / false - ����������
     * @return bool
     */
    public function setDisabled($value)
    {
        if (!is_bool($value))
        {
            return false;
        }
        $this->disabled = $value;
    }

    /**
     * ���������� �������� ���������.
     * @return bool
     */
    public function getDisabled()
    {
        return $this->disabled;
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
     * @param $value
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

    /*
     * ������ ����� �� ����������.
     * ������� �����: ���� ������� ������ ����������,
     * �� ����� ���!
     */
    /*public function removeStyleClass($value)
    {
        if (empty($value))
        {
            return false;
        }
    }*/

    /**
     * ������������� �������� ��������.
     * @param $value bool - �������� ��������
     * @return bool
     */
    public function setCheck($value)
    {
        if (!is_bool($value))
        {
            return false;
        }
        $this->check = $value;
    }

    /**
     * ���������� �������� ��������.
     * @return bool
     */
    public function getCheck()
    {
        return $this->check;
    }

    /**
     * ���������� ������, ���� ��� ��������.
     * @return string
     */
    public function getNoElement()
    {
        return '<span>No element</span>';
    }
}