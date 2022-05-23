import sortValues from './sortValues';

const Vardas = (props) => {
  const sortedValues = sortValues(
    props.values,
    props.sort
  );
  return sortedValues.map(
    (value, i) => (
      <div
        style={{
          color: value.color,
          backgroundColor: 'gold',
        }}
        key={i}
      >
        {value[props.sort]}
      </div>
    )
  );
};

export default Vardas;
