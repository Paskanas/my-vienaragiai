import sortValues from './sortValues';

const Spalva = (props) => {
  const sortedValues = sortValues(
    props.values,
    props.sort
  );
  return sortedValues.map(
    (value, i) => (
      <div
        style={{
          color: value.color,
          backgroundColor: 'cyan',
        }}
        key={i}
      >
        {value[props.sort]}
      </div>
    )
  );
};

export default Spalva;
