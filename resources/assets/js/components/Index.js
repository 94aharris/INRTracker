import React from 'react';
import { render } from 'react-dom';
import Login from './Login';
import Navbar from './Navbar';

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

if (document.getElementById('login')) {
    render(<LoginApp />, document.getElementById('login'));
}
else if (document.getElementById('navbar')) {
    render(<NavbarApp />, document.getElementById('navbar'));
}


