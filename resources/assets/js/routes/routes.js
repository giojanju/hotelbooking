import Home from '../containers/App/Home/Home';
import Hotel from '../containers/App/Hotel/Hotel';
import Pricing from '../containers/App/Pricing/Pricing';

const routes = [
    {
        path: '/hotels/:id',
        exact: false,
        auth: false,
        component: Hotel
    },
    {
        path: '/pricing',
        exact: false,
        auth: false,
        component: Pricing
    },
    {
        path: '/',
        exact: true,
        auth: false,
        component: Home
    },
];

export default routes;