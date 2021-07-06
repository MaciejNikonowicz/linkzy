import Home from './components/Home';
import NotFound from './components/NotFound';
import Register from './components/Register';
import Login from './components/Login';
import Dashboard from './components/Dashboard';

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
            path: '/',
            name: 'HomePage',
            component: Home,
        },
        {
            path: '/login',
            name: 'LoginPage',
            component: Login,
        },
        {
            path: '/register',
            name: 'RegisterPage',
            component: Register,
        },
        {
            path: '/dashboard',
            name: 'DashboardPage',
            component: Dashboard,
        }
    ]
}
