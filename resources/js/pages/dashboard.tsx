import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import ProgressTracker, { Props }from '@/components/dashboard';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Compendium Weekly',
        href: dashboard().url,
    },
];

export default function Dashboard(props: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <ProgressTracker
                initialTasks={props.initialTasks}
                chartData={props.chartData}
            />
        </AppLayout>
    );
}
