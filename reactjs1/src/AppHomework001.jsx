import './AppHomework.css';
import H1H2WithColor005 from './components/009/homeworks/H1H2WithColor005';
import H1H2_004 from './components/009/homeworks/H1H2_004';
import H1WithProp002 from './components/009/homeworks/H1WithProp002';
import HiRabbit001 from './components/009/homeworks/HiRabbit001';
import ZebraiBebrai003 from './components/009/homeworks/ZebraiBebrai003';
function App() {
  return (
    <div className="App">
      <header className="App-header">
        <HiRabbit001 color="pink" />
        <H1WithProp002 value="Labas rytas Lietuva" />
        <ZebraiBebrai003 color={1} />
        <ZebraiBebrai003 color={2} />
        <ZebraiBebrai003 color={0} />
        <H1H2_004
          h1="As esu H1"
          h2="As esu H2"
        />
        <H1H2WithColor005
          h1="H1 tekstas"
          h2="H2 tekstas"
          color="cyan"
        />
      </header>
    </div>
  );
}

export default App;
