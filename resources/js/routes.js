import Home from './components/Home';
import NotFound from './components/NotFound';
import Register from './components/Register';
import Login from './components/Login';
import Dashboard from './components/Dashboard';
import AddLink from './components/AddLink';
import LinkStatistics from './components/LinkStatistics';
import LinkExpired from './components/LinkExpired';

export default {
    mode: 'history',
    linkActiveClass: 'font-semibold',
    routes: [
        {
            path: '*',
            name: 'NotFound',
            component: NotFound,
        },
        {
            path: '/link-expired',
            name: 'LinkExpired',
            component: LinkExpired,
        },
        {
            path: '/',
            name: 'HomePage',
            component: Home,
            meta: {
                hideForAuth: true
            }
        },
        {
            path: '/login',
            name: 'LoginPage',
            component: Login,
            meta: {
                guest: true
            }
        },
        {
            path: '/register',
            name: 'RegisterPage',
            component: Register,
            meta: {
                guest: true
            }
        }, 
        {
            path: '/dashboard',
            name: 'DashboardPage',
            component: Dashboard
        },
        {
            path: '/add-link',
            name: 'AddLinkPage',
            component: AddLink
        },
        {
            path: '/link/:id',
            name: 'LinkStatisticsPage',
            component: LinkStatistics
        }
    ]
}
