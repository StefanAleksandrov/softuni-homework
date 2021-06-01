import { Switch, Route } from 'react-router-dom';

import Home from './components/Home/Home';
import HeaderNav from './components/HeaderNav/HeaderNav';
import Login from './components/Login/Login';
import Register from './components/Register/Register';
import Create from './components/Create/Create';
import Details from './components/Details/Details';
import Delete from './components/Delete/Delete';
import Dashboard from './components/Dashboard/Dashboard';
import MyPets from './components/MyPets/MyPets';
import MyPet from './components/MyPet/MyPet';
import Footer from './components/Footer/Footer';
import Notifications from './components/Notifications/Notifications';
import './App.css';

function App() {
  return (
    <div id="site-content" className="App">
      <HeaderNav />

      <Switch>
        <Route path='/' exact={true} component={Home} />
        <Route path='/login' exact={true} component={Login} />
        <Route path='/register' exact={true} component={Register} />
        <Route path='/create' exact={true} component={Create} />
        <Route path='/details' exact={true} component={Details} />
        <Route path='/delete' exact={true} component={Delete} />
        <Route path='/dashboard' exact={true} component={Dashboard} />
        <Route path='/my-pets' exact={true} component={MyPets} />
        <Route path='/my-pet' exact={true} component={MyPet} />
      </Switch>

      <Notifications />
      <Footer />
    </div>
  );
}

export default App;
