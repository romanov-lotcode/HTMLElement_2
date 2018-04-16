<?php

namespace HTMLElement;

class HTMLSelectOptgroupElement
{
    /*******************************************************
     ********************* ���� ������ *********************
     *******************************************************/

    // ��������� ������������ ��������
    const HTML_E_CONFIG_LABEL_NAME = 'label';
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
     * �������� ���
     * @var string
     */
    private $label = false;


    /*******************************************************
     ******************** ������ ������ ********************
     *******************************************************/

    /**
     * ������������� �������� �������� ��������.
     * @param $key string
     * @param $value string
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
     * ������������� ����� ��������.
     * @param $value string - �����
     */
    public function setLabel($value)
    {
        $this->setConfig(self::HTML_E_CONFIG_LABEL_NAME, $value);
    }

    /**
     * ���������� ����� ��������.
     * @return bool OR string
     */
    public function getLabel()
    {
        return $this->getConfig(self::HTML_E_CONFIG_LABEL_NAME);
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

    /**
     * ������������ ����������� ��� html ��������.
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

        return '</optgroup><optgroup '. $el_attributes .'>';
    }
}