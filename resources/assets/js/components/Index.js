import React from 'react';
import { render } from 'react-dom';
import Login from './Login';

const styles = {
  fontFamily: 'sans-serif',
  textAlign: 'center',
};

const LoginApp = () => (
  <div style={styles}>
    <Login />
   
  </div>
);

render(<LoginApp />, document.getElementById('login'));
