require('./bootstrap');

import React from 'react';
import ReactRenderer from './core/react-renderer';

import UsersIndexComponent from './components/users/UsersIndexComponent';
import UserProfileComponent from './components/users/UserProfileComponent';
import CreateStayComponent from './components/stays/CreateStayComponent';

const components = [
    {
        name:'UsersIndexComponent',
        component: <UsersIndexComponent />
    },
    {
        name:'UserProfileComponent',
        component: <UserProfileComponent />
    },
    {
        name:'CreateStayComponent',
        component: <CreateStayComponent />
    }
];

new ReactRenderer(components).renderAll()
