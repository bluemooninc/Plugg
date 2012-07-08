<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Form/Model/FormfieldGateway.php
*/
abstract class Plugg_Form_Model_Base_FormfieldGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'formfield';
    }

    public function getFields()
    {
        return array('formfield_id' => Sabai_Model::KEY_TYPE_INT, 'formfield_created' => Sabai_Model::KEY_TYPE_INT, 'formfield_updated' => Sabai_Model::KEY_TYPE_INT, 'formfield_name' => Sabai_Model::KEY_TYPE_VARCHAR, 'formfield_title' => Sabai_Model::KEY_TYPE_VARCHAR, 'formfield_description' => Sabai_Model::KEY_TYPE_TEXT, 'formfield_weight' => Sabai_Model::KEY_TYPE_INT, 'formfield_required' => Sabai_Model::KEY_TYPE_INT, 'formfield_disabled' => Sabai_Model::KEY_TYPE_INT, 'formfield_collapsible' => Sabai_Model::KEY_TYPE_INT, 'formfield_collapsed' => Sabai_Model::KEY_TYPE_INT, 'formfield_settings' => Sabai_Model::KEY_TYPE_TEXT, 'formfield_fieldset' => Sabai_Model::KEY_TYPE_INT, 'formfield_field_id' => Sabai_Model::KEY_TYPE_INT, 'formfield_form_id' => Sabai_Model::KEY_TYPE_INT);
    }

    protected function _getSelectByIdQuery($id, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sformfield WHERE formfield_id = %d',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $id
        );
    }

    protected function _getSelectByIdsQuery($ids, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sformfield WHERE formfield_id IN (%s)',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            implode(',', array_map('intval', $ids))
        );
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, $fields)
    {
        return sprintf(
            'SELECT %1$s FROM %2$sformfield WHERE %3$s',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $criteriaStr
        );
    }

    protected function _getInsertQuery($values)
    {
        $values['formfield_created'] = time();
        $values['formfield_updated'] = 0;
        return sprintf("INSERT INTO %sformfield(formfield_created, formfield_updated, formfield_name, formfield_title, formfield_description, formfield_weight, formfield_required, formfield_disabled, formfield_collapsible, formfield_collapsed, formfield_settings, formfield_fieldset, formfield_field_id, formfield_form_id) VALUES(%d, %d, %s, %s, %s, %d, %d, %d, %d, %d, %s, %d, %d, %d)", $this->_db->getResourcePrefix(), $values['formfield_created'], $values['formfield_updated'], $this->_db->escapeString($values['formfield_name']), $this->_db->escapeString($values['formfield_title']), $this->_db->escapeString($values['formfield_description']), $values['formfield_weight'], $values['formfield_required'], $values['formfield_disabled'], $values['formfield_collapsible'], $values['formfield_collapsed'], $this->_db->escapeString($values['formfield_settings']), $values['formfield_fieldset'], $values['formfield_field_id'], $values['formfield_form_id']);
    }

    protected function _getUpdateQuery($id, $values)
    {
        $last_update = $values['formfield_updated'];
        $values['formfield_updated'] = time();
        return sprintf("UPDATE %sformfield SET formfield_updated = %d, formfield_name = %s, formfield_title = %s, formfield_description = %s, formfield_weight = %d, formfield_required = %d, formfield_disabled = %d, formfield_collapsible = %d, formfield_collapsed = %d, formfield_settings = %s, formfield_fieldset = %d, formfield_field_id = %d, formfield_form_id = %d WHERE formfield_id = %d AND formfield_updated = %d", $this->_db->getResourcePrefix(), $values['formfield_updated'], $this->_db->escapeString($values['formfield_name']), $this->_db->escapeString($values['formfield_title']), $this->_db->escapeString($values['formfield_description']), $values['formfield_weight'], $values['formfield_required'], $values['formfield_disabled'], $values['formfield_collapsible'], $values['formfield_collapsed'], $this->_db->escapeString($values['formfield_settings']), $values['formfield_fieldset'], $values['formfield_field_id'], $values['formfield_form_id'], $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$sformfield WHERE formfield_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, $sets)
    {
        $sets['formfield_updated'] = 'formfield_updated=' . time();
        return sprintf('UPDATE %sformfield SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$sformfield WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$sformfield WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _afterInsertTrigger1($id, $new)
    {
    }

    protected function _afterDeleteTrigger1($id, $old)
    {
    }

    protected function _afterUpdateTrigger1($id, $new, $old)
    {
    }

    protected function _afterInsertTrigger($id, $new)
    {
        $this->_afterInsertTrigger1($id, $new);
    }

    protected function _afterUpdateTrigger($id, $new, $old)
    {
        $this->_afterUpdateTrigger1($id, $new, $old);
    }

    protected function _afterDeleteTrigger($id, $old)
    {
        $this->_afterDeleteTrigger1($id, $old);
    }
}