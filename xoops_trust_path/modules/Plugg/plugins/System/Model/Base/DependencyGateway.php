<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/System/Model/DependencyGateway.php
*/
abstract class Plugg_System_Model_Base_DependencyGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'dependency';
    }

    public function getFields()
    {
        return array('dependency_id' => Sabai_Model::KEY_TYPE_INT, 'dependency_created' => Sabai_Model::KEY_TYPE_INT, 'dependency_updated' => Sabai_Model::KEY_TYPE_INT, 'dependency_requires' => Sabai_Model::KEY_TYPE_INT, 'dependency_plugin_id' => Sabai_Model::KEY_TYPE_INT);
    }

    protected function _getSelectByIdQuery($id, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sdependency WHERE dependency_id = %d',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $id
        );
    }

    protected function _getSelectByIdsQuery($ids, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sdependency WHERE dependency_id IN (%s)',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            implode(',', array_map('intval', $ids))
        );
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, $fields)
    {
        return sprintf(
            'SELECT %1$s FROM %2$sdependency WHERE %3$s',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $criteriaStr
        );
    }

    protected function _getInsertQuery($values)
    {
        $values['dependency_created'] = time();
        $values['dependency_updated'] = 0;
        return sprintf("INSERT INTO %sdependency(dependency_created, dependency_updated, dependency_requires, dependency_plugin_id) VALUES(%d, %d, %d, %d)", $this->_db->getResourcePrefix(), $values['dependency_created'], $values['dependency_updated'], $values['dependency_requires'], $values['dependency_plugin_id']);
    }

    protected function _getUpdateQuery($id, $values)
    {
        $last_update = $values['dependency_updated'];
        $values['dependency_updated'] = time();
        return sprintf("UPDATE %sdependency SET dependency_updated = %d, dependency_requires = %d, dependency_plugin_id = %d WHERE dependency_id = %d AND dependency_updated = %d", $this->_db->getResourcePrefix(), $values['dependency_updated'], $values['dependency_requires'], $values['dependency_plugin_id'], $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$sdependency WHERE dependency_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, $sets)
    {
        $sets['dependency_updated'] = 'dependency_updated=' . time();
        return sprintf('UPDATE %sdependency SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$sdependency WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$sdependency WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
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