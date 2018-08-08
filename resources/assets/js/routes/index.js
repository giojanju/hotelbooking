import React from 'react'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import ScrollToTop from '../components/ScrollToTop';

import routes from './routes'

const Routes = () => (
    <Switch>
    	<ScrollToTop>
	        {routes.map((route, i) => {
	            return <Route 
	            	key={i} 
	            	path={route.path} 
	            	exact={route.exact} 
	            	component={route.component} 
	            />
	        })}
	    </ScrollToTop>
    </Switch>
);

export default Routes;