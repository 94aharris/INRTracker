

import React from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import AppBar from 'material-ui/AppBar';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import { render } from 'react-dom';
import Paper from 'material-ui/Paper';
import Drawer from 'material-ui/Drawer';
import MenuItem from 'material-ui/MenuItem';
import IconButton from 'material-ui/IconButton';
import ActionHome from 'material-ui/svg-icons/action/home';
import ActionTimeline from 'material-ui/svg-icons/action/timeline';
import ActionAnnouncement from 'material-ui/svg-icons/action/announcement';
import ActionAssessment from 'material-ui/svg-icons/action/assessment';
import ActionWork from 'material-ui/svg-icons/action/work';
import { Toolbar, ToolbarGroup, ToolbarSeparator, ToolbarTitle } from 'material-ui/Toolbar';

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
    
     const styles = {
      smallIcon: {
        width: 36,
        height: 36,
      },
      mediumIcon: {
        width: 48,
        height: 48,
      },
      largeIcon: {
        width: 60,
        height: 60,
      },
      small: {
        width: 72,
        height: 72,
        padding: 16,
      },
      medium: {
        width: 96,
        height: 96,
        padding: 24,
      },
      large: {
        width: 120,
        height: 120,
        padding: 30
      },
    };

   

    return (
      <div>
        <MuiThemeProvider>
        
            <AppBar
              title="INR Tracker"
              style={appBarColor}
              onClick = {this.handleToggle}
            >
               <Toolbar style={appBarColor}>
                <ToolbarGroup>
                <RaisedButton  style={appBarColor} label="Level" primary={true} />
                <RaisedButton  style={appBarColor} label="MyINR" primary={true} />
              </ToolbarGroup>

              </Toolbar>
              
            <Drawer open = {this.state.open} width ={100}>
             
              <AppBar
                showMenuIconButton= {true}
                style = {appBarColor}
              />
              <IconButton
                iconStyle={styles.largeIcon}
                style={styles.large}
                >
                <ActionHome /> 
                <ActionTimeline />
                <ActionAnnouncement />
                <ActionAssessment/>
                <ActionWork />
                </IconButton>           
            </Drawer>
      
      </AppBar>
          
        </MuiThemeProvider>
      </div>
    )
  };



}

export default Navbar


