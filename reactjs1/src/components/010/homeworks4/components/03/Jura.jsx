import Laivas from './Laivas';
import Sala from './Sala';
import Valtis from './Valtis';

const Jura = (props) => {
  const values = props.values;
  const valtisValues = values.filter(
    (value) => value.type === 'man'
  );
  const laivasValues = values.filter(
    (value) => value.type === 'car'
  );
  const salaValues = values.filter(
    (value) => value.type === 'animal'
  );
  const juraValues = values.filter(
    (value) => value.type === 'fish'
  );
  return (
    <>
      <Valtis values={valtisValues} />
      <Laivas values={laivasValues} />
      <Sala values={salaValues} />
      {juraValues.map((value, i) => (
        <div
          style={{
            color: value.color,
            backgroundColor: 'cyan',
          }}
          key={i}
        >
          {value.name}
        </div>
      ))}
    </>
  );
};

export default Jura;
