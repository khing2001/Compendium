import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import JournalIndex, { Props } from '@/components/journal';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Compendium Journal',
        href: '/journal',
    },
];


export default function Journal(props: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <JournalIndex
                entries={props.entries}
            />
        </AppLayout>
    );
}
