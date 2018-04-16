<?php

namespace HTMLElement;


class HTMLTextElement extends HTMLElementBase
{

    /*******************************************************
     ********************* ���� ������ *********************
     *******************************************************/

    // ��������� ������������ ��������
    const HTML_E_CONFIG_VALUE_NAME = 'value';



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
     * ���������� �������� �� �������.
     * @return bool
     */
    public function setValueFromRequest()
    {
        if (!isset($_REQUEST[$this->getName()]))
        {
            return false;
        }
        $this->setValue(htmlspecialchars($_REQUEST[$this->getName()], null, parent::getDefaultCharset()));
    }
}