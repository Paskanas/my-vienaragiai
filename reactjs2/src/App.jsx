import './App.css';
import './bootstrap.css';
import Create from './Components/Create';
import List from './Components/List';

function App() {
  return (
    <div className='container'>
      <div className='container'>
        <div className='row'>
          <Create />
          <List />
        </div>
      </div>
    </div>
  );
}

export default App;
