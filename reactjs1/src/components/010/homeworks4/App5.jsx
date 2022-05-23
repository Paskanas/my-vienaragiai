import './App5.css';
import Bala from './components/01/Bala';
import Jura from './components/03/Jura';
import Tvenkinys from './components/02/Tvenkinys';
import Vandenynas from './components/04/Vandenynas';
import Pasaulis from './components/05/Pasaulis';
function App() {
  const seaPlaners = [
    {
      id: 1,
      type: 'man',
      name: 'Lina',
      color: 'blue',
    },
    {
      id: 2,
      type: 'car',
      name: 'Opel',
      color: 'red',
    },
    {
      id: 3,
      type: 'animal',
      name: 'Vilkas',
      color: 'green',
    },
    {
      id: 4,
      type: 'fish',
      name: 'Ungurys',
      color: 'yellow',
    },
    {
      id: 5,
      type: 'man',
      name: 'Tomas',
      color: 'green',
    },
    {
      id: 6,
      type: 'animal',
      name: 'Bebras',
      color: 'red',
    },
    {
      id: 7,
      type: 'animal',
      name: 'Barsukas',
      color: 'green',
    },
    {
      id: 8,
      type: 'car',
      name: 'MB',
      color: 'blue',
    },
    {
      id: 9,
      type: 'car',
      name: 'ZIL',
      color: 'red',
    },
    {
      id: 10,
      type: 'man',
      name: 'Teta Toma',
      color: 'yellow',
    },
  ];

  const pasaulisValues = seaPlaners;
  return (
    <div className="App">
      <header className="App-header">
        <Bala arr={seaPlaners} />
        <br />
        <Tvenkinys
          values={seaPlaners}
        />
        <br />
        <Jura values={seaPlaners} />
        <br />
        <Vandenynas
          values={seaPlaners}
        />
        <br />
        <Pasaulis
          values={pasaulisValues}
        />
      </header>
    </div>
  );
}

export default App;
