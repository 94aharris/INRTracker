

import React from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import AppBar from 'material-ui/AppBar';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import { render } from 'react-dom';
import Paper from 'material-ui/Paper';

class Navbar extends React.Component {
  constructor(props) {
    super(props);
  }
  
  render() {
    const style = {
      margin: 12,
    };

    const appBarColor = {
      backgroundColor: '#92b2e5'
    }

    const paper = {
      height: 400,
      width: 400,
      margin: 20,
      textAlign: 'center',
      display: 'inline-block',
      float: 'center'
    };

    const paperRegister = {
      height: 400,
      width: 500,
      margin: 20,
      textAlign: 'center',
      display: 'inline-block',
      float: `center`
    };

    return (
      <div>
        <MuiThemeProvider>
          <div>
            <AppBar
              title="INR Tracker"
              style={appBarColor}
            />
          </div>
        </MuiThemeProvider>
      </div>
    )
  };



}

export default Navbar


