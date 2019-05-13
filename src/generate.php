<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2019-05-13
 */

/**
 * This is a helper script which SHOULD NOT be called with composer's autoload,
 * and MUST be executed alone
 */

include_once __DIR__ . '/Dumper.php';

foreach (get_declared_classes() as $class) {
    if (
        strncmp($class, 'Google\\', 7) !== 0
        && strncmp($class, 'GPB', 12) !== 0
    ) {
        continue;
    }

    $file = __DIR__ . '/generated/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    $dir = dirname($file);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $rc = new ReflectionClass($class);

    $code = "<?php\n\n";

    $code .= "namespace " . $rc->getNamespaceName() . ";\n\n";

    $code .= "class " . $rc->getShortName() . "\n{\n";

    // constants
    foreach ($rc->getConstants() as $k => $v) {
        $code .= "   public const {$k} = " . \Dumper::wrapScalar($v) . ";\n";
    }

    // properties

    foreach ($rc->getProperties(ReflectionProperty::IS_PUBLIC) as $rp) {
        $code .= "   public $" . $rp->getName() . ";\n";
    }

    // methods
    foreach ($rc->getMethods(ReflectionMethod::IS_PUBLIC) as $rm) {
        if (strncmp($rm->getName(), '__', 2) == 0) continue;

        $static = $rm->isStatic() ? ' static ' : ' ';
        if ($class === 'Google\Protobuf\Internal\DescriptorPool' && $rm->getName() === 'getGeneratedPool') {
            $return = ': self';
        } else if ($rm->getName() === 'checkRepeatedField') {
            $return = ': array';
        } else {
            $return = '';
        }

        $code .= <<<EOF
    public{$static}function {$rm->getName()}(...\$parameters)$return
    {
    }\n
EOF;
    }
    $code .= "}";

    file_put_contents($file, $code);
}
