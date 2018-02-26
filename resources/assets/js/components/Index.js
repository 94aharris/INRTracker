import React from 'react';
import { render } from 'react-dom';
import Login from './Login';
import Navbar from './Navbar';
import Home from './Home';

const styles = {
  fontFamily: 'sans-serif',
  textAlign: 'center',
};

const LoginApp = () => (
  <div style={styles}>
    <Login />
   
  </div>
);

const NavbarApp = () => (
  <div style={styles}>
    <Navbar />
  
  </div>
);

const HomeApp = () => (
    <div style={styles}>
    <Home />
  
    </div>
);


if (document.getElementById('login')) {
    render(<LoginApp />, document.getElementById('login'));
}
else if (document.getElementById('navbar')) {
    console.log("Rendering Navbar");
    render(<NavbarApp />, document.getElementById('navbar'));
}
else if (document.getElementById('reacthome')) {
    console.log("Rendering Home");
    render(<HomeApp />, document.getElementById('reacthome'));
}
else if (document.getElementById('chart')) {
    console.log("Rendering Home");
    render(<HomeApp />, document.getElementById('chart'));
}



