import Home from '../containers/App/Home/Home';
import Hotel from '../containers/App/Hotel/Hotel';
import Pricings from '../containers/App/Pricings/Pricings';
import Services from '../containers/App/Services/Services';

const routes = [
    {
        path: '/services',
        exact: false,
        auth: false,
        component: Services
    },
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
        component: Pricings
    },
    {
        path: '/',
        exact: true,
        auth: false,
        component: Home
    },
];

export default routes;