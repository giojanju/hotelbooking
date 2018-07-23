import Home from '../containers/App/Home/Home';

const routes = [
    {
        path: '/',
        exact: true,
        auth: false,
        component: Home
    },
];

export default routes;