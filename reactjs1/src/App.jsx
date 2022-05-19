import './App.css';
import HiRabbit001 from './components/009/homeworks/HiRabbit001';
import Hello from './components/009/Hello';
import Morning from './components/009/Morning';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <Hello
          color="red"
          size="10"
          value={4}
        />
        <Hello
          color="blue"
          size="20"
          value="4"
        />
        <Hello
          color="skyblue"
          size="15"
          value={2 + 2}
        />
        <Morning />
        <HiRabbit001 color="pink" />
      </header>
    </div>
  );
}

export default App;
