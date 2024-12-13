<?php

namespace App\Livewire;

use AllowDynamicProperties;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

#[AllowDynamicProperties] class FormBuilder extends Component
{
    public $elements = [];
    public $layoutIndex;
    public $sectionIndex;
    public $fieldType;

    public $availableFields = [
        'text'     => ['label' => 'Text Field',   'icon'    => 'text_fields'],
        'Paragraph'=> ['label' => 'Paragraph',     'icon'   => 'article'],
        'select'   => ['label' => 'Dropdown',      'icon'   => 'arrow_drop_down'],
        'radio'    => ['label' => 'Radio Button',  'icon'   => 'radio_button_checked'],
        'checkbox' => ['label' => 'Checkbox',      'icon'   => 'select_check_box'],
        'date'     => ['label' => 'date',          'icon'   => 'calendar_month'],
        'time'     => ['label' => 'Time',           'icon'  => 'history_toggle_off'],
        'number'   => ['label' => 'Number',         'icon'  => '123'],
        'file'     => ['label' => 'File Upload',     'icon' => 'upload_file'],
        'email'    => ['label' => 'Email Field',     'icon' => 'mail'],
        'image'    => ['label' => 'Image Upload',    'icon' => 'image'],
        'header'   => ['label' => 'Form Header',     'icon' => 'format_h1'],
        'break'  => ['label' => 'Section Break',   'icon'=> 'more_horiz'],
    ];
    public $layouts = [
        'single' => 'Single Column Layout',
        'double' => 'Two Column Layout',
        'triple' => 'Three Column Layout',
    ];





    public $selectedElement = ''; // Add this property

//    protected $listeners = ['updateStyles' => 'updateStyle'];
//
//    public function updateStyle($fontsize, $fontcolor, $padding)
//    {
//        $this->fontsize = $fontsize;
//        $this->fontcolor = $fontcolor;
//        $this->padding = $padding;
//
//    }


    public function addElement($field, $position = null)
    {
        $uniqueId = uniqid($field['type'] . '_'); // Generate a unique ID for the element
        $newElement = [
            'id' => $uniqueId,
            'type' => $field['type'],
            'label' => ucfirst($field['type']),
            'value' => '',
            'required' => false,
            'options'=> ['Option 1', 'Option 2', 'Option 3'] // Example options

        ];
        if ($field['type'] === 'select') {
            $newElement['options'] = ['Option 1', 'Option 2', 'Option 3']; // Example options
        }
        if ($field['type'] === 'layout') {
            $sectionCount = $field['layoutType'] === 'single' ? 1 : ($field['layoutType'] === 'double' ? 2 : 3);
            $newElement = [
                'id' => $uniqueId,
                'type' => 'layout',
                'layoutType' => $field['layoutType'],
                'label' => ucfirst($field['type']),
                'value' => '',
                'required' => false,
                'sections' => array_fill(0, $sectionCount, []),
                'options'=> ['Option 1', 'Option 2', 'Option 3'] // Example options

            ];
        }

        if ($position !== null) {
            array_splice($this->elements, $position, 0, [$newElement]);
            $index = $position;
            Log::debug('Element added at position:', ['position' => $position, 'element' => $newElement]);
        } else {
            $this->elements[] = $newElement;
            $index = count($this->elements) - 1;
            Log::debug('Element added at end:', ['element' => $newElement]);
        }

        return $index;
    }
//    public function addOption($layoutIndex, $sectionIndex, $fieldIndex)
//    {
//        $this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][$fieldIndex]['options'][] = 'New Option';
//    }
//
//    public function removeOption($layoutIndex, $sectionIndex, $fieldIndex, $optionIndex)
//    {
//        unset($this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][$fieldIndex]['options'][$optionIndex]);
//        $this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][$fieldIndex]['options'] = array_values(
//            $this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][$fieldIndex]['options']
//        );
//    }

    public function saveStyles()
    {
        $this->dispatch('notify', 'Styles saved successfully!');
    }

    public function addFieldToSection($layoutIndex, $sectionIndex, $fieldType)
    {
        $field = [
            'id' => uniqid(),
            'type' => $fieldType,
            'label' => $this->availableFields[$fieldType]['label'],
            'value' => '',
            'required' => false,
            ];

//        if ($fieldType === 'select') {
//            $field['options'] = ['Option 1', 'Option 2', 'Option 3'];
//        }

        $this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][] = $field;
    }

    public function updateField($layoutIndex, $sectionIndex, $fieldIndex, $key, $value)
    {
        $this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][$fieldIndex][$key] = $value;
        dd($this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][$fieldIndex][$key] = $value);

    }
//    public function saveElement($id)
//    {
//        foreach ($this->elements as &$element) {
//            if ($element['id'] === $id) {
//                // تحديث خصائص العنصر إذا لزم الأمر
//                // لا حاجة لتحديث مباشرة لأن البيانات مرتبطة تلقائيًا بـ Livewire
//                break;
//            }
//        }
//
//        // تسجيل عملية الحفظ إن لزم
//        Log::info('Element saved', ['id' => $id]);
//    }

    public function removeElement($id)
    {
        $this->elements = array_filter($this->elements, function ($element) use ($id) {
            return $element['id'] !== $id;
        });
        $this->elements = array_values($this->elements);

    }
    public function removeLayout($id)
    {
        $this->elements = array_filter($this->elements, function ($element) use ($id) {
            return $element['id'] !== $id;
        });
        $this->elements = array_values($this->elements);
    }
    public function removeFieldFromSection($layoutIndex, $sectionIndex, $fieldIndex)
    {
        unset($this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][$fieldIndex]);
        $this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'] = array_values($this->elements[$layoutIndex]['sections'][$sectionIndex]['fields']); // Re-index fields
    }

    public function saveForm()
    {
        // Save form to the database or session
        session()->flash('message', 'Form saved successfully.');
    }

    public function render()
    {
        return view('livewire.form-builder')->layout('layouts.app');
    }
}
