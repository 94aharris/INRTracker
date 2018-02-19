

import React from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import AppBar from 'material-ui/AppBar';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import { render } from 'react-dom';
import Paper from 'material-ui/Paper';
import Drawer from 'material-ui/Drawer';
import MenuItem from 'material-ui/MenuItem';

class Navbar extends React.Component {
  constructor(props) {
    super(props); 
      this.state = {
      open: false
    };
    
    this.handleToggle = this.handleToggle.bind(this);
    this.handleClose = this.handleClose.bind(this);


  }
  
 
  handleToggle() {
    this.setState({ open: !this.state.open});
  }
  

  handleClose() {
    this.setState({ open: false});
  }
 
  render() {
    const style = {
      margin: 12,
    };

    const appBarColor = {
      backgroundColor: '#92b2e5'
    }

   

    return (
      <div>
        <MuiThemeProvider>
        
            <AppBar
              title="INR Tracker"
              style={appBarColor}
              onClick = {this.handleToggle}
            >
              
            <Drawer open = {this.state.open}>
              <MenuItem onClick={this.handleClose}>INR Home Icon will be hear</MenuItem>
              <MenuItem onClick={this.handleClose}>Another Icon will be hear too</MenuItem>
            </Drawer>
      
      </AppBar>
          
        </MuiThemeProvider>
      </div>
    )
  };



}

export default Navbar


