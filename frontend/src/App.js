import React from 'react';
import { BrowserRouter as Router, Route, Routes, Link } from 'react-router-dom';
import { postData, getData } from './api'
//styles
import './App.css';
//components
import UrlForm from './components/UrlForm';
import Redirect from './components/Redirect';

function App() {
  return (
    <Router>
      <div className="App">
        <Routes>
          <Route path="/" element={<UrlForm postFunction={postData} />} />
          <Route path="/:slug" element={<Redirect getFunction={getData} />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;