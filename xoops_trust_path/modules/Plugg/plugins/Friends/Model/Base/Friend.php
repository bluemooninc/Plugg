<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/Friends/Model/Friend.php
*/
abstract class Plugg_Friends_Model_Base_Friend extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Friend', $model);
        $this->_vars = array('friend_id' => 0, 'friend_created' => 0, 'friend_updated' => 0, 'friend_with' => 0, 'friend_relationships' => null, 'friend_user_id' => 0);
    }

    public function __clone()
    {
        $this->_vars = array_merge($this->_vars, array('friend_id' => 0, 'friend_created' => 0, 'friend_updated' => 0));
    }

    public function __toString()
    {
        return 'Friend #' . $this->_get('id', null, null);
    }

    public function assignUser($user, $markDirty = true)
    {
        $this->_set('user_id', $user->id, $markDirty);
        return $this;
    }

    protected function _fetchUser($withData = false)
    {
        if (!isset($this->_objects['User'])) {
            $this->_objects['User'] = $this->_model->User_Identity($this->_vars['friend_user_id'], $withData);
        }

        return $this->_objects['User'];
    }

    public function isOwnedBy($user)
    {
        return $this->user_id && $this->user_id == $user->id;
    }

    protected function _get($name, $sort, $order, $limit = 0, $offset = 0)
    {
        switch ($name) {
        case 'id':
            return $this->_vars['friend_id'];
        case 'created':
            return $this->_vars['friend_created'];
        case 'updated':
            return $this->_vars['friend_updated'];
        case 'with':
            return $this->_vars['friend_with'];
        case 'relationships':
            return $this->_vars['friend_relationships'];
        case 'user_id':
            return $this->_vars['friend_user_id'];
        case 'User':
            return $this->_fetchUser();
        case 'UserWithData':
            return $this->_fetchUser(true);
default:
return isset($this->_objects[$name]) ? $this->_objects[$name] : null;
        }
    }

    protected function _set($name, $value, $markDirty)
    {
        switch ($name) {
        case 'id':
            $this->_setVar('friend_id', $value, $markDirty);
            break;
        case 'with':
            $this->_setVar('friend_with', $value, $markDirty);
            break;
        case 'relationships':
            $this->_setVar('friend_relationships', $value, $markDirty);
            break;
        case 'user_id':
            $this->_setVar('friend_user_id', $value, $markDirty);
            break;
        }
    }

    protected function _initVar($name, $value)
    {
        switch ($name) {
        default:
            $this->_vars[$name] = $value;
            break;
        }
    }
}

abstract class Plugg_Friends_Model_Base_FriendRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Friend', $model);
    }

    public function fetchByUser($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeign('friend_user_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateByUser($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('User', $id, $perpage, $sort, $order);
    }

    public function countByUser($id)
    {
        return $this->_countByForeign('friend_user_id', $id);
    }

    public function fetchByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeignAndCriteria('friend_user_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function paginateByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('User', $id, $criteria, $perpage, $sort, $order);
    }

    public function countByUserAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByForeignAndCriteria('friend_user_id', $id, $criteria);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_Friends_Model_Base_FriendsByRowset($rs, $this->_model->create('Friend'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_Friends_Model_Base_Friends($this->_model, $entities);
    }
}

class Plugg_Friends_Model_Base_FriendsByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Plugg_Friends_Model_Friend $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Friends', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $entity->initVars($row);
    }
}

class Plugg_Friends_Model_Base_Friends extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Friends', $entities);
    }
}