require('./bootstrap');
import React from 'react';
import ReactRenderer from './core/react-renderer'

import ExampleComponent from './components/Example'
import CreateStayComponent from './components/stays/CreateStayComponent';

const components = [
    {
        name:'ExampleComponent',
        component: <ExampleComponent />
    },
    {
        name:'CreateStayComponent',
        component: <CreateStayComponent />
    }
]

new ReactRenderer(components).renderAll()
