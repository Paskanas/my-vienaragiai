import { useState } from 'react';
import './App.css';
import randomColor from './functions/randomColor';

function App2() {
  const [spalva, setSpalva] =
    useState('skyblue');
  const [sum, setSum] = useState(1);
  const [kv, setKv] = useState([]);
  // const cats = [
  //   'Pilkis',
  //   'Rainis',
  //   'Murkis',
  // ];

  const stebuklas = () => {
    console.log('blue ');
    // const newColor =
    //   spalva === 'blue'
    //     ? 'red'
    //     : 'blue';
    // setSpalva(newColor);
    setSpalva((oldColor) =>
      oldColor === 'blue'
        ? 'red'
        : 'blue'
    );
    // if (spalva === 'blue') {
    //   setSpalva('red');
    // } else {
    //   setSpalva('blue');
    // }

    return () => kitasStebuklas();
  };
  const kitasStebuklas = (
    arg1 = 'nieko'
  ) => {
    setSum(sum + 1);
    setSpalva('red');
    console.log(spalva + arg1);
  };

  const sumSum = () => {
    setSum(sum + 1);
  };

  const addKv = () => {
    setSum(sum + 1);
    setKv((kvm) => [
      ...kvm,
      {
        random: randomColor(),
        sum: sum,
      },
    ]);
  };
  const removeKv = () => {
    setSum(sum - 1);
    setKv((kvm) =>
      kvm.splice(0, kvm.length - 1)
    );
  };

  const resetKv = () => {
    setSum(1);
    setKv([]);
  };

  return (
    <div className="App">
      <header className="App-header">
        <h1>State</h1>
        <h1>State {sum}</h1>
        <div className="kvc">
          {kv.map((k, key) => (
            <div
              className="kv"
              key={key}
              style={{
                backgroundColor:
                  k.random,
              }}
            >
              {k.sum}
            </div>
          ))}
        </div>
        {/* <button onClick={stebuklas()}>
          Preess me!
        </button> */}
        <button
          onClick={stebuklas}
          style={{
            backgroundColor: spalva,
          }}
        >
          Make it blue
        </button>
        <button
          onClick={() =>
            kitasStebuklas('lababababa')
          }
          style={{
            backgroundColor: spalva,
          }}
        >
          Make it red
        </button>
        <button onClick={sumSum}>
          {sum}
        </button>
        <button onClick={addKv}>
          Add kv
        </button>
        <button onClick={removeKv}>
          Remove kv
        </button>
        <button onClick={resetKv}>
          Reset kv
        </button>
      </header>
    </div>
  );
}

export default App2;
