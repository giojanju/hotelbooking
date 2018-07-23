import React from 'react'
import { BrowserRouter, Route, Switch } from 'react-router-dom'

import routes from './routes'
import Home from '../containers/App/Home/Home';

const Routes = () => (
    <BrowserRouter>
        <Switch>
            {routes.map((route, i) => {
                return <Route key={i} path={route.path} exact={route.exact} component={route.component} />
            })}
        </Switch>
    </BrowserRouter>
);

export default Routes;