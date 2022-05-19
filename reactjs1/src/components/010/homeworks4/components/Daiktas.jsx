const Daiktas = (props) => {
  const values = props.values;
  let showValues;
  if (props.show === 1) {
    showValues = values.map(
      (value, i) =>
        value.id % 2 === 0 ? null : (
          <div
            style={{
              color: props.color,
            }}
            key={i}
          >
            {value.id} {value.type}{' '}
            {value.name} {value.color}
          </div>
        )
    );
  } else if (props.show === 2) {
    showValues = values.map(
      (value, i) =>
        value.id % 2 !== 0 ? null : (
          <div
            style={{
              color: props.color,
            }}
            key={i}
          >
            {value.id} {value.type}{' '}
            {value.name} {value.color}
          </div>
        )
    );
  }
  console.log('lala', showValues);
  return showValues;
};

export default Daiktas;
