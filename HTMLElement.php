<?php

use HTMLElement\HTMLTextIntegerElement;
use HTMLElement\HTMLTextStringElement;
use HTMLElement\HTMLTextTextareaElement;

use HTMLElement\HTMLTextDateTimeDateElement;
use HTMLElement\HTMLTextDateTimeTimeElement;

use HTMLElement\HTMLSelectElement;
use HTMLElement\HTMLSelectOptionElement;
use HTMLElement\HTMLSelectOptgroupElement;

use HTMLElement\HTMLCheckboxAndRadioCheckboxElement;
use HTMLElement\HTMLCheckboxAndRadioRadioElement;

/*
 * ���������� ��������
 */
// ���� ��� ���� ���������
include_once dirname(__FILE__).'/HTMLElementBase.php';

// ���� ��� ��������� ���������
include_once dirname(__FILE__).'/HTMLTextElement.php';

include_once dirname(__FILE__).'/HTMLTextIntegerElement.php';
include_once dirname(__FILE__).'/HTMLTextStringElement.php';
include_once dirname(__FILE__).'/HTMLTextTextareaElement.php';

// ���� ��� ��������� date � time
include_once dirname(__FILE__).'/HTMLTextDateTimeElement.php';

include_once dirname(__FILE__).'/HTMLTextDateTimeDateElement.php';
include_once dirname(__FILE__).'/HTMLTextDateTimeTimeElement.php';

include_once dirname(__FILE__).'/HTMLSelectElement.php';

// ���� ��� ��������� checckbox � radio
include_once dirname(__FILE__).'/HTMLCheckboxAndRadio.php';

include_once dirname(__FILE__).'/HTMLCheckboxAndRadioCheckboxElement.php';
include_once dirname(__FILE__).'/HTMLCheckboxAndRadioRadioElement.php';


