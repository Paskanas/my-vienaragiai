const Daiktas = (props) => {
  const values = props.values;
  let showValues;
  if (props.show === 1) {
    showValues = values.filter(
      (value) => value.id % 2 !== 0
    );
  } else if (props.show === 2) {
    showValues = values.filter(
      (value) => value.id % 2 === 0
    );
  }
  return showValues.map((value, i) => (
    <div
      style={{
        color: props.color,
      }}
      key={i}
    >
      {value.id} {value.type}{' '}
      {value.name} {value.color}
    </div>
  ));
};

export default Daiktas;
