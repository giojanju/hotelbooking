import Home from '../containers/App/Home/Home';
import Hotel from '../containers/App/Hotel/Hotel';
import Pricings from '../containers/App/Pricings/Pricings';
import Services from '../containers/App/Services/Services';
import About from '../containers/App/About/About';

const routes = [
    {
        path: '/services',
        exact: false,
        auth: false,
        component: Services
    },
    {
        path: '/about',
        exact: false,
        auth: false,
        component: About
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