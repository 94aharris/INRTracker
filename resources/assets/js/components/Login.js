import React from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import AppBar from 'material-ui/AppBar';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import { render } from 'react-dom';
//import axios from 'react-axios'
import Paper from 'material-ui/Paper';


import Navbar from './Navbar.js'

class Login extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      email: '',
      password: ''
    };

  }
  handleClick(event) {
    //removed base URL not needed
    //var apiBaseUrl = "http://0.0.0.0/";
    var self = this;
    var payload = {
      //added csrf token to payload
      "_token": $('meta[name="csrf-token"]').attr('content'),
      //modified 'username' to 'email'
      "email": this.state.email,
      "password": this.state.password
    }
    axios.post('login', payload)
      .then(function (response) {
        console.log(response);
        // modified from response.data.code to response.status
        if (response.status == 200) {
          console.log("Login successfull");
          alert("Login Successful");
          var uploadScreen = [];
          uploadScreen.push()
          self.props.appContext.setState({ loginPage: [], uploadScreen: uploadScreen })
          this.props.history.push('/home')
        }
        else if (response.status == 401) {
          console.log("Email and or Password is Incorrect");
          alert("Email and or Password is Incorrect")
        }
        else {
          console.log(response.status);
          alert("Error During Login");
        }
      })
      .catch(function (error) {
        console.log(error);
        if (error.response.status == 401) {
          alert("Email and or Password is Incorrect");
        }
      });
  }
  
  registerUser(event) {
    window.location = '/register';
  }
  
  homePage(event) {
    window.location = '/home';
  }



  render() {
    const style = {
      margin: 12,
    };

    const appBarColor = {
      backgroundColor: '#92b2e5',
      showMenuIconButton: false,
    }

    const paper = {
      height: 400,
      width: 400,
      margin: 20,
      textAlign: 'center',
      display: 'inline-block'
    };

    const paperRegister = {
      height: 400,
      width: 500,
      margin: 20,
      textAlign: 'center',
      display: 'inline-block'
    };
    
    const centerText = {
      top: 'flex',
      textAlign: 'center'
    }

    return (
      <div>
        <MuiThemeProvider>
          <div>
            <Navbar/>
      
     
              <Paper style={paper} zDepth={3} rounded={false}>
                <h1 style={style}>Login</h1>
                <TextField
                  hintText="Enter your Email"
                  floatingLabelText="Email"
                  onChange={(event, newValue) => this.setState({ email: newValue })}
                />
                <br />
                <TextField
                  type="password"
                  hintText="Enter your Password"
                  floatingLabelText="Password"
                  onChange={(event, newValue) => this.setState({ password: newValue })}
                />
                <br />
                <RaisedButton label="Login" style={style} onClick={(event) => this.handleClick(event)}/>
              </Paper>

              <Paper style={paperRegister} zDepth={3} rounded={false} style={paperRegister}>
                <p style={centerText}>
                  Please log in with your username and e-mail to the left.  First time users may register by clicking the button below.
                  A valid e-mail address will be required.</p>

                <RaisedButton label="Register" fullWidth={true} onClick={(event) => this.registerUser(event)}/>
              </Paper>
                  
          </div>
        </MuiThemeProvider>
      </div>
    )
  };



}

export default Login


