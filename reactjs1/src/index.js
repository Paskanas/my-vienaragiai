import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
// import App from './App';
// import App2 from './App2';
// import App3 from './components/010/homeworks2/App3';
// import App4 from './components/010/homeworks3/App4';
// import App5 from './components/010/homeworks4/App5';
// import App from './AppHomework001';
import App011 from './components/011/lesson/App011';
import reportWebVitals from './reportWebVitals';

const root = ReactDOM.createRoot(
  document.getElementById('root')
);
root.render(
  // <React.StrictMode>
  // <App />
  // <App2 />
  // <App3 />
  // <App4 />
  // <App5 />
  <App011 />

  // </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
