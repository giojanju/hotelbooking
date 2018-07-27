import Home from '../containers/App/Home/Home';
import Hotel from '../containers/App/Hotel/Hotel';

const routes = [
    {
        path: '/',
        exact: true,
        auth: false,
        component: Home
    },
    {
        path: '/hotels/:id',
        exact: true,
        auth: false,
        component: Hotel
    },
];

export default routes;