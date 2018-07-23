import React from 'react'
import { BrowserRouter, Route, Switch } from 'react-router-dom'

import routes from './routes'

const Routes = () => (
    <Switch>
        {routes.map((route, i) => {
            return <Route key={i} path={route.path} exact={route.exact} component={route.component} />
        })}
    </Switch>
);

export default Routes;