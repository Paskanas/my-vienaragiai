import './App4.css';
function App() {
  const dogs = [
    'šuo',
    'šunius',
    'Bobikas',
    'kudlius',
    'Šarikas',
    'avigalvis',
  ];

  const sortedDogs = [...dogs].sort(
    (a, b) => b.length - a.length
  );

  return (
    <div className="App">
      <header className="App-header">
        <div className="squareContainer">
          {dogs.map((dog, i) => (
            <div
              className="square"
              key={i}
            >
              {dog}
            </div>
          ))}
        </div>
        <div className="squareContainer">
          {sortedDogs.map((dog, i) => (
            <div
              className="cirkle"
              key={i}
            >
              {i + 1} {dog}
            </div>
          ))}
        </div>
        <div className="squareContainer">
          {dogs.map((dog, i) =>
            dog[0] ===
            dog[0].toUpperCase() ? null : (
              <div
                className={
                  (i + 1) % 2 === 0
                    ? 'square'
                    : 'cirkle'
                }
                key={i}
              >
                {dog}
              </div>
            )
          )}
        </div>
        <div className="squareContainer">
          {dogs.map((dog, i) => (
            <div
              className={'square'}
              key={i}
              style={{
                color:
                  dog.length > 6
                    ? 'green'
                    : 'red',
              }}
            >
              {dog} {dog.length}
            </div>
          ))}
        </div>
      </header>
    </div>
  );
}

export default App;
